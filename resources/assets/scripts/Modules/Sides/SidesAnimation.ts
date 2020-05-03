import Selector from '@tools/Selector';
import VisibilityState from '@states/VisibilityState';

/**
 * ...
 */
class SidesAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private left: Element;

    /**
     * ...
     *
     * @type Element
     */
    private right: Element;

    /**
     * ...
     *
     * @type { left: VisibilityState; right: VisibilityState }
     */
    private state: { left: VisibilityState; right: VisibilityState };

    /**
     * The constructor.
     */
    public constructor() {
        this.left = Selector.element('side-left').get();
        this.right = Selector.element('side-right').get();
        this.state = { left: new VisibilityState(), right: new VisibilityState() };
    }

    /**
     * ...
     *
     * @return void
     */
    public showLeft() {
        if (this.state.left.isVisible()) { return; }
        if (this.state.right.isVisible()) { this.hideRight(); }

        this.left.classList.add('slide-panels__side-left_visible');
        this.left.classList.remove('slide-panels__side-left_hidden');
        this.state.left.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public showRight() {
        if (this.state.right.isVisible()) { return; }
        if (this.state.left.isVisible()) { this.hideLeft(); }

        this.right.classList.add('slide-panels__side-right_visible');
        this.right.classList.remove('slide-panels__side-right_hidden');
        this.state.right.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.hideLeft();
        this.hideRight();
    }

    /**
     * ...
     *
     * @return void
     */
    public hideLeft() {
        if (this.state.left.isHidden()) { return; }

        this.left.classList.add('slide-panels__side-left_hidden');
        this.left.classList.remove('slide-panels__side-left_visible');
        this.state.left.setHidden();
    }

    /**
     * ...
     *
     * @return void
     */
    public hideRight() {
        if (this.state.right.isHidden()) { return; }

        this.right.classList.add('slide-panels__side-right_hidden');
        this.right.classList.remove('slide-panels__side-right_visible');
        this.state.right.setHidden();
    }
}

export default SidesAnimation;
