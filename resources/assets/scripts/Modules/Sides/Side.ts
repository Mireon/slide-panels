import SideAnimation from '@modules/Sides/SideAnimation';
import { C } from '@entities/C';

/**
 * ...
 */
class Side {
    /**
     * ...
     */
    private animation: SideAnimation;

    /**
     * The constructor.
     *
     * @param side { C.side }
     *   ...
     */
    public constructor(side: C.side) {
        this.animation = new SideAnimation(side);
    }

    /**
     * ...
     *
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

export default Side;
