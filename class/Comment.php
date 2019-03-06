<?php

class Comment
{
    const PSEUDO_MIN = 3;
    const MESSAGE_MIN = 10;
    
    private $pseudo;
    private $message;
    private $date;

    public function __construct(string $pseudo, string $message)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->date = new DateTime();
    }

    public function isValid()
    {
        return empty($this->getErrors());
    }

    public function getErrors()
    {
        $errors = [];
        if(strlen($this->pseudo) < self::PSEUDO_MIN)
        {
            $errors['pseudo'] = "Votre pseudo est trop court !";
        }
        if(strlen($this->message) < self::MESSAGE_MIN)
        {
            $errors['message'] = "Votre message est trop court !";
        }

        return $errors;
    }

    public function toJson()
    {
        return json_encode(
            [
            'pseudo' => $this->pseudo,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
            ]);
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getDate()
    {
        return $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
    }

}
