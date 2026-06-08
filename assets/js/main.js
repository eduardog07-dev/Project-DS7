function cambiarTema() {

    const body = document.body;

    if (body.classList.contains("oscuro")) {

        body.classList.remove("oscuro");
        body.classList.add("claro");

        localStorage.setItem("tema", "claro");

    } else {

        body.classList.remove("claro");
        body.classList.add("oscuro");

        localStorage.setItem("tema", "oscuro");
    }
}

window.onload = function () {

    const tema = localStorage.getItem("tema");

    if (tema) {

        document.body.classList.add(tema);

    } else {

        document.body.classList.add("claro");
    }
};