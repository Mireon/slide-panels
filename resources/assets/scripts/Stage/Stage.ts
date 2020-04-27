import Backstage from './Backstage/Backstage';
import Panels from './Panels/Panels';
import LeverClickListener from '../Levers/LeverClickListener';

Panels.setOnClickListener(() => Backstage.toggleVisibility());

/**
 * ...
 */
enum State {
    HIDDEN = 'hidden',
    VISIBLE = 'visible',
}

/**
 * ...
 */
class Stage {
    /**
     * ...
     *
     * @type Stage
     */
    private static instance: Stage;

    /**
     * ...
     *
     * @type NodeListOf<Element>
     */
    private element: HTMLElement;

    /**
     * ...
     *
     * @type string
     */
    private state: string;

    /**
     * The constructor.
     */
    private constructor() {
        this.element = document.getElementById('slide-panels');
        this.state = State.HIDDEN;
    }

    /**
     * Return the instance of this class.
     *
     * @return Stage
     */
    public static getInstance(): Stage {
        if (!Stage.instance) {
            this.instance = new Stage();
        }

        return Stage.instance;
    }

    getState(): string {
        return this.state;
    }

    setState(state: string): void {
        this.state = state;
    }

    isState(state: string): boolean {
        return this.getState() === state;
    }

    isVisible() {
        return this.isState(State.VISIBLE);
    }

    isHidden() {
        return this.isState(State.HIDDEN);
    }

    showStage() {
        this.setState(State.VISIBLE);
        this.element.classList.add('slide-panels__stage_visible');
        this.element.classList.remove('slide-panels__stage_hidden');
    }

    hideStage() {
        this.setState(State.HIDDEN);
        this.element.classList.add('slide-panels__stage_hidden');
        this.element.classList.remove('slide-panels__stage_visible');
    }

    toggleVisibilityStage() {
        this.isHidden() ? this.showStage() : this.hideStage();
        Backstage.toggleVisibility();
    }

    getLeverClickListener(): LeverClickListener {
        return (lever: Element) => {
            this.toggleVisibilityStage();
        };
    }
}

export default Stage.getInstance();
