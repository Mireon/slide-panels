import BackstageAnimation from '@modules/Backstage/BackstageAnimation';
import State from '@tools/State';

/**
 * ...
 */
class Backstage {
    /**
     * ...
     */
    private animation: BackstageAnimation;

    /**
     * ...
     *
     * @type State
     */
    private state: State;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new BackstageAnimation();
        this.state = new State();
    }

    /**
     * ...
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
     * ...
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

export default Backstage;
