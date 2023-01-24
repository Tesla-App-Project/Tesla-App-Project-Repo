<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>S'inscrire</h1>
			<input type="text" placeholder="Identifiant" />
			<input type="email" placeholder="Nom" />
			<input type="password" placeholder="Prénom" />
            <input type="text" placeholder="Email" />
			<input type="email" placeholder="Mot de passe" />
			<input type="password" placeholder="Token voiture" />
			<button>S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Se connecter</h1>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Mot de passe" />
			<a href="#">Mot de passe oublié ?</a>
			<button>Se connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>De retour ?</h1>
				<p>Si tu possède déja un compte, connecte toi !</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Salut l'ami !</h1>
				<p>Si tu ne possède pas de compte, inscrit toi !</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>
<script src="./assets/js/connexion.js"></script>