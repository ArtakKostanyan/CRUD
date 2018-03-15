<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Base\Request;
use App\Base\Validation\Validator;

class HomeController
{
    /**
     * @return null|string
     * @throws \Exception
     */
    public function index()
    {

        $users = User::all();

        return view('home', [
            'users' => $users
        ]);
    }
    /**
     * @return null|string
     * @throws \Exception
     */
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {

        $data = $request->all();

        $filtered = array_filter_recursive($data);

        $validator = new Validator();

        $validator = $validator->make($filtered, [
            'username' => 'required',
            'email'    => 'required|email',
        ]);

        if ($validator) {
            header("HTTP/1.0 422 Unprocessable Entity");
            return $validator;
        }

        if (User::save($filtered)) {
          return  header("Location: /");

        }

        header("HTTP/1.0 404 Not Found");
        return json_encode(['message' => 'something went wrong']);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function edit(Request $request)
    {
        $data=$request->all(  );
        $id= $data['username'];
        $users=User::find($id);
        return view('edit', [
            'users' => $users
        ]);





    }

    /**
     * @param Request $request
     * @return string
     */
    public function update(Request $request)
    {


        $data = $request->all();

        $filtered = array_filter_recursive($data);


        $validator = new Validator();

        $validator = $validator->make($filtered, [
            'username' => 'required',
            'email'    => 'required|email',
        ]);

        if ($validator) {
            header("HTTP/1.0 422 Unprocessable Entity");
            return $validator;
        }

        if (User::update($filtered)) {
            return  header("Location: /");

        }

        header("HTTP/1.0 404 Not Found");
        return json_encode(['message' => 'something went wrong']);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function destroy($id)

    {
      User::delete($id);
     return view('home');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function multiDestroy(Request $request)
    {
        $emails = $request->get('emails');

        foreach ($emails as $email) {
            User::delete($email);
        }

        return json_encode($emails);
    }

    /**
     * @param Request $request
     * @return null|string
     */
    public function search(Request $request)
    {
        $q = $request->get('q');

        $query = $q;

        $qq = strip_tags($q);
        $qq = preg_replace('!\s+!', ' ', $qq);
        $qq = stripslashes($qq);
        $qq = trim($qq, '/');
        $qq = trim($qq);
        $qq = explode(' ', $qq);
        $queryVariables = array_unique(array_filter($qq));

        $jsonData = User::all();

        $items = [];
        foreach ($queryVariables as $queryVariable) {
            $find = false;
            foreach ($jsonData as $obj) {
                $item = new static();
                foreach ($obj as $key => $value) {
                    if (!is_array($value)) {
                        if (strpos($value, $queryVariable) !== false) {
                            $find = true;
                        }
                    } else {
                        foreach ($value as $v) {
                            if (strpos($v, $queryVariable) !== false) {
                                $find = true;
                            }
                        }
                    }

                    $item->$key = $value;
                }
                if ($find) {
                    $items[] = $item;
                    $find = false;
                }
            }
        }

        $no = 0;

        return view('result', [
            'items' => $items,
            'no' => $no,
            'query' => $query
        ]);
    }
}
