<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Http\Requests\Discussions\RespondToDiscussionRequest;
use FloatingPoint\Grapevine\Http\Requests\Discussions\ModifyCommentRequest;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\RespondToDiscussionCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Commands\ModifyCommentCommand;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Comment;
use FloatingPoint\Grapevine\Modules\Discussions\Data\CommentRepository;
use FloatingPoint\Grapevine\Modules\Discussions\Data\DiscussionRepository;

class CommentController extends Controller
{
    private $discussions;
    private $comments;

    public function __construct(DiscussionRepository $discussions, CommentRepository $comments)
    {
        $this->discussions = $discussions;
        $this->comments = $comments;
    }

    public function create($discussionSlug)
    {
        $discussion = $this->discussions->getBySlug($discussionSlug);
        $comment = new Comment;
        $comment->discussion()->associate($discussion);

        return $this->respond('comments.create', compact('comment', 'discussion'));
    }

    public function store(RespondToDiscussionRequest $request, $discussionSlug)
    {
        $discussion = $this->discussions->getBySlug($discussionSlug);

        $this->dispatch(new RespondToDiscussionCommand(
            1,
            $discussion->id,
            $request->get('title'),
            $request->get('content')
        ));

        return redirect()->route('discussions.show', [$discussionSlug]);
    }

    public function edit($discussionSlug, $id)
    {
        $comment = $this->comments->getById($id);
        $discussion = $this->discussions->getBySlug($discussionSlug);

        return $this->respond('comments.edit', compact('comment', 'discussion'));
    }

    public function update(ModifyCommentRequest $request, $discussionSlug, $id)
    {
        $discussion = $this->discussions->getBySlug($discussionSlug);
        $this->dispatch(new ModifyCommentCommand($id, $discussion->id, $request->get('title'), $request->get('content')));

        return redirect()->route('discussions.show', [$discussionSlug]);
    }

    public function destroy($discussionSlug, $id)
    {
        $comment = $this->comments->getById($id);
        $this->comments->delete($comment);

        return redirect()->route('discussions.show', [$discussionSlug]);
    }
}
