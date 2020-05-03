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
     * The constructor.
     *
     * @param side { C.side }
     *   ...
     */
    public constructor(side: C.side) {
        this.side = side;
        this.element = Selector.element(`side-${side}`).get();
    }

    /**
     * ...
     *
     * @return void
     */
    public inside() {
        this.element.classList.add(`slide-panels__side-${this.side}_inside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_outside`);
    }

    /**
     * ...
     *
     * @return void
     */
    public outside() {
        this.element.classList.add(`slide-panels__side-${this.side}_outside`);
        this.element.classList.remove(`slide-panels__side-${this.side}_inside`);
    }
}

export default SideAnimation;
