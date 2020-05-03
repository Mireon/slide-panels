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
        this.state.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        if (this.state.isHidden()) { return; }

        this.animation.hide();
        this.state.setHidden();
    }
}

export default Backstage;
