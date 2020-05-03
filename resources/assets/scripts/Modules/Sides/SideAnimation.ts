import Visibility from '@states/Visibility';
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
     * @type state { Visibility }
     */
    private state: Visibility;

    /**
     * The constructor.
     *
     * @param side { C.side }
     *   ...
     */
    public constructor(side: C.side) {
        this.side = side;
        this.element = Selector.element(`side-${side}`).get();
        this.state = new Visibility();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        if (this.state.isVisible()) { return; }

        this.element.classList.add(`slide-panels__side-${this.side}_visible`);
        this.element.classList.remove(`slide-panels__side-${this.side}_hidden`);
        this.state.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        if (this.state.isHidden()) { return; }

        this.element.classList.add(`slide-panels__side-${this.side}_hidden`);
        this.element.classList.remove(`slide-panels__side-${this.side}_visible`);
        this.state.setHidden();
    }
}

export default SideAnimation;
