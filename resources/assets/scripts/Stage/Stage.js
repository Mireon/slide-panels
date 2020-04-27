import Backstage from './Backstage/Backstage';
import Panels from './Panels/Pannels';

Panels.setOnClickListener(() => Backstage.toggleVisibility());

const SELECTOR = 'slide-panels__stage';
const HIDDEN = 'hidden';
const VISIBLE = 'visible';

class Stage {
    constructor() {
        if (!Stage.instance) {
            Stage.instance = this;
        }

        this.element = document.getElementById('slide-panels');
        this.status = HIDDEN;

        return Stage.instance;
    }

    isVisible() {
        return this.status === VISIBLE;
    }

    isHidden() {
        return this.status === HIDDEN;
    }

    showStage() {
        this.element.classList.add('slide-panels__stage_visible');
        this.element.classList.remove('slide-panels__stage_hidden');
    }

    hideStage() {
        this.element.classList.add('slide-panels__stage_hidden');
        this.element.classList.remove('slide-panels__stage_visible');
    }

    toggleVisibilityStage() {
        this.isHidden() ? this.showStage() : this.hideStage();
        Backstage.toggleVisibility();
    }

    execute(lever) {
        this.toggleVisibilityStage();
    }
}

const instance = new Stage();
Object.freeze(instance);

export default instance;
