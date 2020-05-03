import SideAnimation from '@modules/Sides/SideAnimation';
import Location from '@states/Location';
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
     * ...
     *
     * @type state { Location }
     */
    private state: Location;

    /**
     * The constructor.
     *
     * @param side { C.side }
     *   ...
     */
    public constructor(side: C.side) {
        this.animation = new SideAnimation(side);
        this.state = new Location();
    }

    /**
     * ...
     *
     *
     * @return void
     */
    public inside() {
        if (this.state.isInside()) { return; }

        this.animation.inside();
        this.state.setInside();
    }

    /**
     * ...
     *
     * @return void
     */
    public outside() {
        if (this.state.isOutside()) { return; }

        this.animation.outside();
        this.state.setOutside();
    }
}

export default Side;
