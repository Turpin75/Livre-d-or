<?php

class GuestBook
{
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function addComment(Comment $comment)
    {
        file_put_contents($this->file, $comment->toJson() . PHP_EOL, FILE_APPEND);
    }

    public function getComments()
    {
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL, $content);
        $comments = [];
        foreach($lines as $line)
        {
            $datas = json_decode($line, true);
            $comments[] = new Comment($datas['pseudo'], $datas['message'], new DateTime("@".$datas['date']));
        }
        
        return array_reverse($comments);
    }
    
}
