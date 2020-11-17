//MAP ELEMENTS HTML
let generalContainer = document.querySelector(".general-container-form-contact");
let formContainerContact = document.querySelector(".form-contact-container");
let itemVisibleForm = document.querySelector(".item-open-form");
let itemIconCloseForm = document.querySelector(".item-icon-close-form");
let openFormMobile = document.querySelector(".item-open-form-mobile");
let formContact = document.querySelector(".needs-validation-form");
let iconFormContact = document.querySelector("#icon-form-contact");
let alertSuccessMessage = document.querySelector("#alert-success-status-form-contact");
let phoneNumberUserFixed = document.querySelector("#phone-number-user-fx").value;

let activeFormOpen;

//ADD EVENTS ITEMS
itemIconCloseForm.addEventListener("click", function () {
	activeFormOpen = false;
	setLocalStorage("activeFormContent", {isVisibleFormContact: false});
	isVisibleItem(formContainerContact, "none");
	isVisibleItem(itemVisibleForm, "flex");
	iconFormContact.className = "fa fa-sort-up";
});

//BTN CONTACT OPEN AND CLOSE
itemVisibleForm.addEventListener("click", function () {
	if (!activeFormOpen) {
		activeFormOpen = true;
		setLocalStorage("activeFormContent", {isVisibleFormContact: true});
		isVisibleItem(formContainerContact, "flex");
		isVisibleItem(itemVisibleForm, "none");
	} else {
		activeFormOpen = false;
		setLocalStorage("activeFormContent", {isVisibleFormContact: false});
		isVisibleItem(formContainerContact, "none");
		isVisibleItem(itemVisibleForm, "flex");
		iconFormContact.className = "fa fa-sort-up";
	}
});

//LOAD CONFIG
function onLoadFunction() {
	let activeFormContent_ = getLocalStorage("activeFormContent");

	activeFormContent_ == null &&
		setLocalStorage("activeFormContent", {isVisibleFormContact: true});

	if (!getLocalStorage("activeFormContent").isVisibleFormContact) {
		activeFormOpen = false;
		if (!activeFormOpen) {
			isVisibleItem(formContainerContact, "none");
			isVisibleItem(itemVisibleForm, "flex");
		}
	} else {
		activeFormOpen = true;
		if (activeFormOpen) {
			isVisibleItem(formContainerContact, "flex");
			isVisibleItem(itemVisibleForm, "none");
		}
	}
}

document.body.addEventListener("load", onLoadFunction());

//VALIDATE CONTENT FORM
function validateForm() {
	let nameValue = document.querySelector("#input-names-fixed").value;
	let lastNameValue = document.querySelector("#input-lastNames-fixed").value;
	let emailValue = document.querySelector("#input-email-fixed").value;
	let phoneValue = document.querySelector("#input-phone-fixed").value;
	let messageValue = document.querySelector("#mensaje-de-usuario").value;

	let stateMessage = document.querySelector("#state-message");

	if (!nameValue || !lastNameValue || !emailValue || !phoneValue || !messageValue) {
		isVisibleItem(stateMessage, "inherit");
		stateMessage.innerHTML = "*Ups te falto llenar el formulario";
		stateMessage.style.color = "red";
		setLocalStorage("activeAlert", {isVisibleAlert: false});

		return false;
	} else {
		let userDataSt = {
			userName: nameValue.toLowerCase(),
			userLastName: lastNameValue.toLowerCase(),
			userEmail: emailValue.toLowerCase(),
			userPhone: phoneValue.toLowerCase(),
			userMessage: messageValue.toLowerCase(),
		};

		activeFormOpen = false;
		setLocalStorage("activeFormContent", {isVisibleFormContact: false});
		isVisibleItem(formContainerContact, "none");
		//SET DATA
		setLocalStorage("userData", userDataSt);
		setLocalStorage("activeAlert", {isVisibleAlert: true});
		isVisibleItem(stateMessage, "none");

		const refMessage = `https://api.whatsapp.com/send?phone=+51${phoneNumberUserFixed}&text=*MENSAJE DESDE WEB TÉCNICOS SERVITEC*%0A%0A*Nombres:*%0A${names_}%0A%0A*Apellidos:*%0A${lastNames_}%0A%0A*Télefono:*%0A${phone_}%0A%0A*Email:*%0A${email_}%0A%0A*Mensaje:*%0A${message_}`;

		window.open(refMessage);

		nameValue = "";
		lastNameValue = "";
		emailValue = "";
		phoneValue = "";
		messageValue = "";

		return true;
	}
}

//ACTIVE ALERT MESSAGE
let activeAlert_ = getLocalStorage("activeAlert");
let userData_ = getLocalStorage("userData");

if (activeAlert_ && userData_) {
	if (activeAlert_.isVisibleAlert) {
		alertSuccessMessage.style.display = "inherit";
		alertSuccessMessage.innerHTML = `${userData_.userName.toUpperCase()} tu mensaje se ah enviado exitosamente, enseguida lo contáctaremos`;
	} else {
		alertSuccessMessage.style.display = "none";
	}

	setTimeout(function () {
		alertSuccessMessage.style.display = "none";
		setLocalStorage("activeAlert", {isVisibleAlert: false});
		//DELETE USER DATA
		userData_ && localStorage.removeItem("userData");
	}, 4000);
}

//LISTENER STATE LOCAL STORAGE******************************************>>>
/* if(getLocalStorage("activeFormContent").isVisibleFormContact){
        isVisibleItem(formContainerContact,"flex");
    }else{
        isVisibleItem(formContainerContact,"none"); 
    } */
//<<<********************************************************************End

//FUNCTIONS LOCAL STORAGE
function setLocalStorage(key, value) {
	localStorage.setItem(key, JSON.stringify(value));
}

function getLocalStorage(key) {
	return JSON.parse(localStorage.getItem(key));
}

//ACTION ISVISIBLE ELEMENT
function isVisibleItem(item, value) {
	item.style.display = value;
}
