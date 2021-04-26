<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Traits\ImageTrait;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use \Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    use ImageTrait;

    /**
     * @var UserRepository
     */
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
     * @return View
     */
    public function index(): View
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
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
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
            return back()->withInput();
        }

        $data = $request->input();

        if ($request->has('image')) {
            $filepath = $this->generateFilePath($request, '/uploads/users');
            Storage::disk('users')->url($filepath);
            $user->image = $filepath;
            $user->save();
        }

        $result = $user->update($data);

        return $result === true ? redirect()->route('account.index') : back()->withInput();
    }
}
