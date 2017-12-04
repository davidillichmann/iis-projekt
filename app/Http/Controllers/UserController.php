<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show($userId)
    {
        $loggedUserItem = iisUserRepository()->getItemById(auth()->id());
        if($loggedUserItem->isAdmin()) {
            $userItems = iisUserRepository()->getAllItems();
            return view('user.show', compact('loggedUserItem', 'userItems'));
        } else {
            return view('user.show', compact('loggedUserItem'));
        }
    }

    public function changeToOrganiser($userId)
    {
        iisUserRepository()->updateRoleByUserId('organiser', $userId);

        return redirect()->back();
    }

    public function changeToUser($userId)
    {
        iisUserRepository()->updateRoleByUserId('user', $userId);

        return redirect()->back();
    }

    public function delete($userId)
    {
        iisUserRepository()->deleteById($userId);

        return redirect()->back();
    }

    public function editForm($userId)
    {
        $userItem = iisUserRepository()->getItemById($userId);

        return view('user.edit', compact('userItem'));
    }

    public function edit(Request $data, int $userId)
    {
        $data = $this->validatorEdit($data);
        if($userItem = iisUserRepository()->getItemById($userId)) {
            iisUserRepository()->updateById($data, $userId);
        }
        return redirect(route('user.show', $userId));
    }

    protected function validatorEdit(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|integer',
        ]);
    }
}
