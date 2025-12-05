window.onload = function() {
    let button = document.querySelector("#lookup");
    let input = document.querySelector("#country");
    let cityButton = document.querySelector("#lookup-cities");

    // When clicking the button
    button.addEventListener("click", () => {
        let country = input.value;
        fetch(`world.php?country=${country}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#result").innerHTML = data;
            });
    });

    cityButton.addEventListener("click", () => {
        let country = document.querySelector("#country").value;
        
        fetch(`world.php?country=${country}&lookup=cities`)
            .then(response => response.text())
            .then(data => {
                 document.querySelector("#result").innerHTML = data;
            });
    });
};
