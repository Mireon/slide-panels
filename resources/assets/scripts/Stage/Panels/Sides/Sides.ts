import SidesAnimation from './SidesAnimation';

/**
 * ...
 */
class Sides {
    /**
     * ...
     */
    private animation: SidesAnimation;

    /**
     * The constructor.
     */
    constructor() {
        this.animation = new SidesAnimation();
    }

    /**
     * ...
     *
     * @param target { Array<string> }
     *   ...
     *
     * @return void
     */
    public show(target: Array<string>) {
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

export default Sides;
