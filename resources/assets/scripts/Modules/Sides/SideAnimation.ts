import Location from '@states/Location';
import Selector from '@tools/Selector';
import { C } from '@entities/C';

/**
 * ...
 */
class SideAnimation {
    /**
     * ...
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type Element
     */
    private element: Element;

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
        this.side = side;
        this.element = Selector.element(`side-${side}`).get();
        this.state = new Location();
    }

    /**
     * ...
     *
     * @return void
     */
    public inside() {
        if (this.state.isInside()) { return; }

        this.element.classList.add(`slide-panels__side-${this.side}_inside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_outside`);
        this.state.setInside();
    }

    /**
     * ...
     *
     * @return void
     */
    public outside() {
        if (this.state.isOutside()) { return; }

        this.element.classList.add(`slide-panels__side-${this.side}_outside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_inside`);
        this.state.setOutside();
    }
}

export default SideAnimation;
