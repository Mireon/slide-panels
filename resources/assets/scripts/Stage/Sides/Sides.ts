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
    public constructor() {
        this.animation = new SidesAnimation();
    }

    /**
     * ...
     *
     * @param side { string }
     *   ...
     *
     * @return void
     */
    public show(side: string) {
        switch (side) {
            case 'left':
                this.animation.showLeft();
                break;
            case 'right':
                this.animation.showRight();
                break;
        }
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
