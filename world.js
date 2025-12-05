window.onload = function() {
    let button = document.querySelector("#lookup");

    button.addEventListener("click", () => {
        let country = document.querySelector("#country").value;
        fetch(`world.php?country=${country}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#result").innerHTML = data;
            });
    });
};
