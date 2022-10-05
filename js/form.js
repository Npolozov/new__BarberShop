
const form = document.getElementById('form')


form.addEventListener('submit', formSend);

console.log(form)

function formSend(e) {
    e.preventDefault();

    let self = e.currentTarget;

    // отправка
		let formData = new FormData(self);
		let xhr = new XMLHttpRequest();

        console.log(formData);

        formData.forEach(item => {
            console.log(item);
        })
		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					console.log('Отправлено');
                }
            }
        }

        xhr.open('POST', 'mail.php', true);
		xhr.send(formData);
        e.currentTarget.reset();
}




