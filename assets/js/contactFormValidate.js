let btnSendMessage = document.querySelector("#btn-send-message");
let warningMessage = document.querySelector("#warning-message");
let phoneNumberUser = document.querySelector("#phone-number-user").value;

let inputName = document.querySelector("#input-names");
let inputLastname = document.querySelector("#input-lastNames");
let inputPhone = document.querySelector("#input-phone");
let inputEmail = document.querySelector("#input-email");
let textAreaDescription = document.querySelector("#message-user-fo");

inputName.addEventListener("input", function () {
	getDataItems(inputName, inputName.value, "names");
});
inputLastname.addEventListener("input", function () {
	getDataItems(inputLastname, inputLastname.value, "lastNames");
});
inputPhone.addEventListener("input", function () {
	getDataItems(inputPhone, inputPhone.value, "phone");
});
inputEmail.addEventListener("input", function () {
	getDataItems(inputEmail, inputEmail.value, "email");
});
textAreaDescription.addEventListener("input", function () {
	getDataItems(textAreaDescription, textAreaDescription.value, "message");
});

function validateFormContact() {
	if (
		!validateEmailFormat("email", inputEmail.value) ||
		!sessionStorage.getItem("names") ||
		!sessionStorage.getItem("lastNames") ||
		!sessionStorage.getItem("phone") ||
		!sessionStorage.getItem("email")
	) {
		return false;
	} else {
		const names_ = sessionStorage.getItem("names");
		const lastNames_ = sessionStorage.getItem("lastNames");
		const phone_ = sessionStorage.getItem("phone");
		const email_ = sessionStorage.getItem("email");
		const message_ = sessionStorage.getItem("message");

		const refMessage = `https://api.whatsapp.com/send?phone=+51${phoneNumberUser}&text=*MENSAJE DESDE WEB TÉCNICOS SERVITEC*%0A%0A*Nombres:*%0A${names_}%0A%0A*Apellidos:*%0A${lastNames_}%0A%0A*Télefono:*%0A${phone_}%0A%0A*Email:*%0A${email_}%0A%0A*Mensaje:*%0A${message_}`;
		window.open(refMessage);
		sessionStorage.clear();
		return true;
	}
}

function getDataItems(item, value, key) {
	if (value.length <= 1) {
		sessionStorage.setItem(key, value);
		return addClassNew(item, "warning-border");
	} else {
		addClassNew(item, "-");
		setSessionStorage(key, value);
		validateEmailFormat(key, value);
	}
}

function setSessionStorage(key, value) {
	sessionStorage.setItem(key, value);
}

function addClassNew(item, value) {
	return (item.className = value);
}

function setClassNameAll(value) {
	inputName.className = value;
	inputLastname.className = value;
	inputPhone.className = value;
	inputEmail.className = value;
	textAreaDescription.className = value;
}

function defaultValueItems() {
	const names_ = sessionStorage.getItem("names");
	const lastnames_ = sessionStorage.getItem("lastNames");
	const phone_ = sessionStorage.getItem("phone");
	const email_ = sessionStorage.getItem("email");
	const message_ = sessionStorage.getItem("message");

	if (names_.length >= 1 && names_.length !== null) {
		inputName.value = names_;
	}
	if (lastnames_.length >= 1 && lastnames_.length !== null) {
		inputLastname.value = names_;
	}
	if (phone_.length >= 1 && phone_.length !== null) {
		inputPhone.value = phone_;
	}
	if (email_.length >= 1 && email_.length !== null) {
		inputEmail.value = email_;
	}
	if (message_.length >= 1 && message_.length !== null) {
		textAreaDescription.value = message_;
	}
}

function validateEmailFormat(key, valueEmail) {
	const regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (key === "email") {
		let result = regexEmail.test(String(valueEmail).toLowerCase());
		if (result) {
			warningMessage.style.display = "none";
			return result;
		} else {
			warningMessage.style.display = "inherit";
			return result;
		}
	}
}

defaultValueItems();
