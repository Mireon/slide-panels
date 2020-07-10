import BackstageAnimation from '@modules/Backstage/BackstageAnimation';
import State from '@tools/State';

/**
 * The backstage.
 */
export default class Backstage {
    /**
     * The animation of backstage.
     */
    private readonly animation: BackstageAnimation;

    /**
     * The state of backstage.
     *
     * @type State
     */
    private readonly state: State;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new BackstageAnimation();
        this.state = new State();
    }

    /**
     * Shows the backstage.
     *
     * @return void
     */
    public show() {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.show();
        }
    }

    /**
     * Hides the backstage.
     *
     * @return void
     */
    public hide() {
        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.hide();
        }
    }
}
