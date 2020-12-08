<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /** @var UserRepository */
    private $users;

    /**
     * UserController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        $user = $this->users->find(auth()->user()->id);

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return view('account.index', [
            'user' => $user
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function edit(int $id)
    {
        $user = $this->users->find($id);

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return view('account.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param UserRequest $request
     * @param int $user_id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, int $user_id): RedirectResponse
    {
        $user = $this->users->find($user_id);

        if ($user === null) {
            return back()
                ->withInput();
        }

        $updateUser = $request->all();
        $result = $user->update($updateUser);

        if ($result === true) {
            return redirect()
                ->route('account.index');
        }

        return back()
            ->withInput();
    }
}
