class Panels {
    constructor() {
        if (!Panels.instance) {
            Panels.instance = this;
        }

        this.element = document.getElementById('slide-panels__panels');

        return Panels.instance;
    }

    setOnClickListener(listener) {
        this.element.addEventListener('click', listener);
    }
}

const instance = new Panels();
Object.freeze(instance);

export default instance;
