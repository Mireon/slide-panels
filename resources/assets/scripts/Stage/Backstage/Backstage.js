class Backstage {
    constructor() {
        if (!Backstage.instance) {
            Backstage.instance = this;
        }

        this.element = document.getElementById('slide-panels__backstage');

        return Backstage.instance;
    }

    toggleVisibility() {
        this.element.classList.toggle('slide-panels__backstage_visible');
        this.element.classList.toggle('slide-panels__backstage_hidden');
    }
}

const instance = new Backstage();
Object.freeze(instance);

export default instance;
