<!DOCTYPE html>
<html>
    <form action="action.php" method="post">
        <input type="text" name="lastname" placeholder="Nom"/>
        <input type="text" name="firstname" placeholder="Prénom"/>
        <input type="email" name="mail" placeholder="E-mail"/>
        <input type="text" name="society" placeholder="Nom de la société"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <select>
            <option value="1">Administrateur</option>
            <option value="0">Client</option>
        </select>
        <input type="submit" value="OK"> 
    </form>
</html>