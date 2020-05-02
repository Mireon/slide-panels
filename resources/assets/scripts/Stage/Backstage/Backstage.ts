import BackstageAnimation from './BackstageAnimation';

/**
 * ...
 */
class Backstage {
    /**
     * ...
     */
    private animation: BackstageAnimation;

    /**
     * The constructor.
     */
    public constructor() {
        this.animation = new BackstageAnimation();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.animation.show();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.animation.hide();
    }
}

export default Backstage;
