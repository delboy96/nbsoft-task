<?php 
require_once ('../components/header.php'); 
?>

<div class="container d-flex flex-column w-75 align-items-center justify-content-center border border-2 border-gray rounded-4 bg-light-subtle">
    <h2 class="border-bottom w-100 border-2 border-gray text-center px-4 py-3">js form val</h2>
    <form id="createUser" action="" method="" class="d-flex w-50 my-3 py-4 px-6">
        <fieldset class="d-flex flex-column justify-content-around w-100">
            <legend class="fst-italic"> Unos novog korisnika</legend>
            <label for="name">Ime </label>
            <input id="name" name="name" type="text" placeholder="Ime" >
            <label for="name">Prezime </label>
            <input id="surname" name="surname" type="text" placeholder="Prezime" >
            <label for="gender">Pol: </label>
            <div class="d-flex flex-row justify-content-around w-50 align-self-center">
                <input id="male" name="gender" type="checkbox"><label for="male">Male</label>
                <input id="female" name="gender" type="checkbox"><label for="male">Female</label>
            </div>
            <label for="birthdate">Datum rođenja </label>
            <input id="birthdate"  name="birthdate" type="date" placeholder="Datum rođenja" value="1900-01-01">
            <label for="address">Adresa </label>
            <textarea id="address" name="address" type="textarea" placeholder="Adresa" rows="1" maxlength="200" ></textarea>
            <label for="city">Grad </label>
            <select id="city" name="city" class=""></select>
            <button type="submit" class="w-75 rounded-3 border border-1 border-dark py-2 px-3 align-self-center mt-3 fw-medium">Napravi novog korisnika</button>
        </fieldset>
    </form>
    <div id="errors" class="text-danger text-decoration-none">

    </div>
</div>

<?php 
require_once ('../components/footer.php');
?>