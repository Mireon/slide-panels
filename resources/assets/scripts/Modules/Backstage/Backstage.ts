import BackstageAnimation from '@modules/Backstage/BackstageAnimation';
import Visibility from '@states/Visibility';

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
     * @type Visibility
     */
    private state: Visibility;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new BackstageAnimation();
        this.state = new Visibility();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        if (this.state.isVisible()) { return; }

        this.animation.show();
        setTimeout(() => this.state.setVisible(), 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        if (this.state.isHidden()) { return; }

        this.animation.hide();
        setTimeout(() => this.state.setHidden(), 300);
    }
}

export default Backstage;
