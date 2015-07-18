<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

class QuestionService extends Service
{
    protected static $cast = Question::class;

    public function get(Question $question)
    {
        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        return $this->callAndCast('get', "question/{$question->getId()}");
    }

    public function delete(Question $question)
    {
        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->call('delete', "question/{$question->getId()}");
    }

    public function save(Question $question)
    {
        if (!$question->getId() && !$question->getCampaignId()) {
            throw new ErrorException('Question id or Campaign id required!');
        }

        if ($question->getId()) {
            $verb = 'put';
            $url  = 'question/' . $question->getId();
        } else {
            $verb = 'post';
            $url  = 'question';
        }

        return $this->callAndCast($verb, $url, $question->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'questions');
    }

    public function getMany()
    {
        return $this->callAndCastMany('get', 'questions');
    }

    public function saveMany(array $questions)
    {
        foreach ($questions as $key => $question) {
            if (!$question->getId() && !$question->getCampaignId()) {
                throw new ErrorException('Question id or Campaign id required!');
            }

            $questions[$key] = $question->toArray();
        }

        return $this->callAndCastMany('post', 'questions', $questions);
    }
}