<?php

namespace App\Http\Controllers\Api\V1;

use Dingo\Api\Auth\Auth;
use App\Repositories\NoteRepository;
use Illuminate\Http\Request;
use App\Transformers\NoteTransformer;

class NoteApiController extends BaseController
{
    /**
     * @var NoteRepository
     */
    protected $noteRepository;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param NoteRepository $noteRepository
     */
    public function __construct(NoteRepository $noteRepository, Request $request)
    {
        $this->noteRepository = $noteRepository;
        $this->request = $request;
    }

    /**
     * Retrieve all notes associated with user
     * @param  Auth   $auth
     * @return Response
     */
    public function index(Auth $auth)
    {
        $note = $this->noteRepository->findAllBy('user_id', $auth->user()->id);

        return $this->response->array($note->toArray());
    }

    /**
     * Retrieve note by given id
     * @param  mixed $id
     * @return Response
     */
    public function show($id)
    {
        // Later, make sure resource exist and user is authorized

        $note = $this->noteRepository->findById($id);

        if(is_null($note)) {
            abort(404);
        }
            
        return $this->response->item($note, new NoteTransformer);
    }

    /**
     * Create new note
     * @param  Request $request
     * @param  Auth    $auth
     * @return Response
     */
    public function store(Auth $auth)
    {
        $this->validate($this->request, [
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $data = [
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content'),
            'user_id' => $auth->user()->id
        ];

        $this->noteRepository->create($data);
    }

    /**
     * Update a record
     * @param  mixed $id
     * @return Response
     */
    public function update($id)
    {
        // Later, make sure resource exist and user is authorized

        $this->validate($this->request, [
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $data = [
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content')
        ];

        $this->noteRepository->update($data, $id);
    }

    /**
     * Delete a record
     * @param  mixed $id
     * @return Response
     */
    public function destroy($id)
    {
        // Later, make sure resource exist and user is authorized

        $this->noteRepository->delete($id);
    }
}