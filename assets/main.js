document.addEventListener("DOMContentLoaded", function () {

    // displaying cities in form dd
    const citydd = document.querySelector('#city');
    const cities = ["Beograd" , "Novi Sad" , "Niš"];
    let displayCities = '<option id="0">Izaberite grad</option>';

    for (const city of cities) {
        displayCities += '<option id="' + city + '">' + city + '</option>';
    }
    
    citydd.innerHTML = displayCities;

    // setting today as default date
    document.getElementById('birthdate').valueAsDate = new Date();


    // form validation
    let form = document.querySelector('#createUser');

    form.addEventListener('submit', function(e){
        e.preventDefault();
        const name = document.querySelector('#name');
        const surname = document.querySelector('#surname');
        const genders = document.querySelectorAll('input[type="checkbox"]:checked');
        let gender = '';
        const birthdate = document.querySelector('#birthdate');
        const address = document.querySelector('#address');
        const city = document.querySelector('#city');

        let errors= [];

        if (name.value.length < 2 || name.value.length > 30) {
            errors.push('Name must have between 2 and 30 characters.');
            // name.style.border = '1px solid red';
        }

        if (surname.value.length < 3 || surname.value.length > 40) {
            errors.push('Surname must have between 3 and 40 characters.');
        }

        if(genders.length < 1){
            // console.log('no gender chosen');
            errors.push('You must choose gender.');

        } else if (genders.length > 1){
            // console.log('you must choose one gender');
            errors.push('You cannot choose more than one gender.');
        } else {
            for(const gen of genders){
                gender = gen.id;
            };
        }

        // checking if chosen city is in cities array
        if(!cities.includes(city.value)){
            errors.push('You must choose city.');
        }

        if (address.value.length < 4 || address.value.length > 200) {
            errors.push('Address must have between 4 and 200 characters.');
        }


        const contentDiv = document.querySelector('body > div');
        let contentDisplay = '<h2 class="border-bottom w-100 border-2 border-gray text-center px-4 py-3">js form val</h2><div class="d-flex flex-column justify-content-around w-100 text-center"><h3 class="text-success fst-italic mb-3">Uspesno poslati podaci!</h3>'; 
        const errorDiv = document.querySelector("#errors");
        let errorsDisplay = '<ul class="list-unstyled">'

        if (!errors.length == 0) {
            for(const error of errors) {
                console.log(error);
                errorsDisplay += '<li>' + error + '</li>';
            }
        } else {
            // console.log('ok')
            // console.log(name.value, surname.value, gender, birthdate.value, address.value, city.value);

            $.ajax({
                url:'../php/fetch.php',
                method:'POST',
                data: {
                    name: name.value,
                    surname: surname.value,
                    gender: gender,
                    birthdate: birthdate.value,
                    address: address.value,
                    city: city.value
                },
                success: function(user) {
                    form.style.display = "none !important";
                    console.log(user);
                    contentDisplay += '<span> Ime: ' + user.name + '</span></br><span> Prezime: ' + user.surname + '</span></br><span> Pol: ' + user.gender + '</span></br><span> Datum rodjenja: ' + user.birthdate + '</span></br><span> Adresa: ' + user.address + '</span></br><span> Grad: ' + user.city + '</span></br> </div>'
                    contentDiv.innerHTML = contentDisplay;
                }

            })

        }

        errorsDisplay += '</ul>';
        errorDiv.innerHTML = errorsDisplay ;

    })

    
    
});