<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Musonza\Chat\Chat;
use Throwable;

class ChatController extends Controller {

    /**
     * @var \App\User $user
     */
    protected $user;

    /**
     * @var AuthManager $auth
     */
    protected $auth;

    /**
     * @var Chat $chat
     */
    protected $chat;

    /**
     * Constructeur
     *
     * @param Chat          $chat
     * @param User          $user
     * @param AuthManager   $auth
     */
    public function __construct(Chat $chat, User $user, AuthManager $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->chat = $chat;
        $this->middleware('auth');
    }

    /**
     * Index de la messagerie privée
     *
     * @return Factory|View
     */
    public function index()
    {
        $conversations = $this->chat
            ->conversations()
            ->setParticipant($this->user->find($this->auth->user()->id))
            ->get()
            ->toArray()['data'];

        $conversations = Arr::pluck($conversations, 'conversation');

        $data = [
            'conversations' => array_map('intval', $conversations),
            'participant' => [
                'id' => auth()->user()->id,
            ]
        ];

        dd($data);

        return view('chat.index', compact('data'));
    }

    /**
     * Conversation
     *
     * @param string $id
     * @return Factory|\Illuminate\View\View
     */
    /*public function chat($id = '')
    {
        $this->talk->setAuthUserId($this->auth->user()->id);
        $conversations = $this->talk->getMessagesByUserId($id, 0, 999);
        $user = '';
        $messages = [];
        if(!$conversations) {
            $user = User::find($id);
        } else {
            $user = $conversations->withUser;
            $messages = $conversations->messages;
        }
        if (count($messages) > 0) {
            $messages = $messages->sortBy('id');

            foreach($messages as $chat) {
                if ($this->auth->user()->id !== $chat->user_id) {
                    $this->talk->makeSeen($chat->id);
                }
            }
        }
        return view('chat.index', compact(['messages', 'user']));
    }*/

    /**
     * Création d'un chat
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     * @throws Throwable
     */
    /*public function store(Request $request)
    {
        if($request->ajax()) {
            $this->talk->setAuthUserId($this->auth->user()->id);

            $rules = [
                'chat-data' => 'required',
                '_id'=>'required'
            ];

            $this->validate($request, $rules);

            $body = $request->input('chat-data');
            $userId = $request->input('_id');

            if ($chat = $this->talk->sendMessageByUserId($userId, $body)) {
                $html = view('chat.ajax.new-chat', compact('chat'))->render();
                return response()->json(['status' => 'success', 'html' => $html], 200);
            }
        }
    }*/

    /**
     * Supprimer un chat
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    /*public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            if($this->talk->deleteMessage($id)) {
                return response()->json(['status'=>'success'], 200);
            }

            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
        }
    }*/

}
