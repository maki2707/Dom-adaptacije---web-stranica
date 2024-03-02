"use strict";
let words = document.querySelectorAll(".word");
words.forEach((word) => {
	let letters = word.textContent.split("");
	word.textContent = "";
	letters.forEach((letter) => {
		let span = document.createElement("span");
		span.textContent = letter;
		span.className = "letter";
		word.append(span);
	});
});
let currentWordIndex = 0;
let maxWordIndex = words.length - 1;
words[currentWordIndex].style.opacity = "1";
let rotateText = () => {
	let currentWord = words[currentWordIndex];
	let nextWord =
		currentWordIndex === maxWordIndex ? words[0] : words[currentWordIndex + 1];
	// rotate out letters of current word
	Array.from(currentWord.children).forEach((letter, i) => {
		setTimeout(() => {
			letter.className = "letter out";
		}, i * 80);
	});
	// reveal and rotate in letters of next word
	nextWord.style.opacity = "1";
	Array.from(nextWord.children).forEach((letter, i) => {
		letter.className = "letter behind";
		setTimeout(() => {
			letter.className = "letter in";
		}, 340 + i * 80);
	});
	currentWordIndex =
		currentWordIndex === maxWordIndex ? 0 : currentWordIndex + 1;
};
rotateText();
setInterval(rotateText, 4000);

function uncheckMenuBtn() {
	setTimeout(function () {
		document.getElementById("menuBtn").checked = false;
	}, 1000); // 1000ms = 1 second
}

// Add an onclick event listener to all nav ul li a elements
var navLinks = document.querySelectorAll("nav ul li a");
for (var i = 0; i < navLinks.length; i++) {
	navLinks[i].addEventListener("click", uncheckMenuBtn);
}

let openAnswer = null;

const accordionLinks = document.querySelectorAll(".accordion-link");

accordionLinks.forEach((link) => {
	link.addEventListener("click", () => {
		const answer = link.nextElementSibling;

		if (answer !== openAnswer) {
			// close the currently open answer, if any
			if (openAnswer) {
				openAnswer.classList.add("collapsed");
			}
			// open the clicked answer
			answer.classList.remove("collapsed");
			// set the clicked answer as the currently open answer
			openAnswer = answer;
		} else {
			// toggle the clicked answer
			answer.classList.toggle("collapsed");
			// clear the currently open answer variable
			openAnswer = answer.classList.contains("collapsed") ? null : answer;
		}
	});
});
