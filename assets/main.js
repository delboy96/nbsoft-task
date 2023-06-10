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

        const errorDiv = document.querySelector("#errors");
        let errorsDisplay = '<ul class="list-unstyled">'

        if (!errors.length == 0) {
            for(const error of errors) {
                console.log(error);
                errorsDisplay += '<li>' + error + '</li>';
            }
        } else {
            console.log('ok')
            console.log(name.value, surname.value, gender, birthdate.value, address.value, city.value)
        }

        errorsDisplay += '</ul>';
        errorDiv.innerHTML = errorsDisplay ;

    })

    // $.ajax({
    //     url:'',
    //     method:'POST',
    //     data:,
    //     success:,

    // })
    
});