import Selector from '@tools/Selector';
import Visibility from '@states/Visibility';

/**
 * ...
 */
class StageAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private element: Element;

    /**
     * ...
     *
     * @type Visibility
     */
    private state: Visibility;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.root().get();
        this.state = new Visibility();
    }

    /**
     * ...
     *
     * @return void
     */
    public show(): void {
        if (this.state.isVisible()) { return; }

        this.element.classList.add('slide-panels__stage_visible');
        this.element.classList.remove('slide-panels__stage_hidden');
        this.state.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isHidden()) { return; }

        this.element.classList.add('slide-panels__stage_hidden');
        this.element.classList.remove('slide-panels__stage_visible');
        this.state.setHidden();
    }
}

export default StageAnimation;
