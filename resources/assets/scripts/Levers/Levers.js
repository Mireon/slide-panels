class Levers {
    constructor() {
        if (!Levers.instance) {
            Levers.instance = this;
        }

        this.elements = document.querySelectorAll('[rel="slide-panels"][data-action="open"]');

        return Levers.instance;
    }

    setOnClickLeverListener(listener) {
        this.elements.forEach(lever => {
            lever.addEventListener('click', e => listener(e, lever));
        });
    }
}

const instance = new Levers();
Object.freeze(instance);

export default instance;
