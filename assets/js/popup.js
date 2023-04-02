const token_input = document.getElementById("token");
const validate_token_button = document.getElementById("validate_token");

validate_token_button.addEventListener("click", () => {
    if (document.getElementById("error-token")) {
        document.getElementById("error-token").remove();
    }
    if (token_input.value.length > 0) {

        fetch("/user/verifyToken",
            {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({token: token_input.value})
            })
            .then(response => {
                return response.json();
            })
            .then(data => {
                console.log(data);
                if (data["response"] === "error") {
                    document.getElementById("section-flex").insertAdjacentHTML("afterend", '<span class="modal__button" id="error-token" style="background-color: red; color: white; margin-top: 2vh"> Veuillez entrer un token valide</span>');
                }
                else if(data["response"] === "validate")
                {
                    return window.location.href = "/user/refreshToken"
                }
            })
            .catch(error => {
                console.log(error);
            })
    } else {
        console.log("Valeur non vide stp le sang")
    }
})