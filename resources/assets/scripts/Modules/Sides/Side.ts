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
    public inside() {
        this.animation.inside();
    }

    /**
     * ...
     *
     * @return void
     */
    public outside() {
        this.animation.outside();
    }
}

export default Side;
