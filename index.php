<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Livre d'or</title>
</head>

<?php

    require_once 'traitement.php';
?>

<body>
    <div class="container my-4">
        <h2>Livre d'or</h2>

        <?php if(isset($errors)):?>
            <div class="alert alert-danger"><?= "Formulaire invalide" ?></div>
        <?php endif; ?>

        <?php if(isset($success)):?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <form action="" method="post" >
            <div class="form-group">
                <input type="text" class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '' ?>" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?= $pseudo ?? '' ?>">
                <?php if(isset($errors['pseudo'])): ?>
                    <div class="invalid-feedback"><?= $errors['pseudo'] ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <textarea class="form-control  <?= isset($errors['message']) ? 'is-invalid' : '' ?>" name="message" id="message" rows="3" placeholder="Votre message"><?= $message ?? '' ?></textarea>
                <?php if(isset($errors['message'])): ?>
                    <div class="invalid-feedback"><?= $errors['message'] ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <?php if(!empty($comments)): ?>
            <div class="mt-4">
                <h2>Vos messages : </h2>
                <?php 
                    foreach($comments as $comment):
                        echo '<p><strong>'.$comment->getPseudo().'</strong> le <em>'.$comment->getDate()->format('d/m/Y à H:i').'</em> :<br>'.
                            nl2br($comment->getMessage());
                    endforeach; 
                 ?>
            </div>
        <?php endif; ?>
    
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
