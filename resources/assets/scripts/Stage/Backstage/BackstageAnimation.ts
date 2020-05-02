import Selector from '@scripts/Utilities/Selector';
import VisibilityState from '@scripts/Utilities/VisibilityState';

/**
 * ...
 */
class BackstageAnimation {
    /**
     * ...
     *
     * @type Element
     */
    private element: Element;

    /**
     * ...
     *
     * @type VisibilityState
     */
    private state: VisibilityState;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.element('backstage').get();
        this.state = new VisibilityState();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        if (this.state.isVisible()) { return; }

        this.element.classList.add('slide-panels__backstage_visible');
        this.element.classList.remove('slide-panels__backstage_hidden');
        this.state.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        if (this.state.isHidden()) { return; }

        this.element.classList.add('slide-panels__backstage_hidden');
        this.element.classList.remove('slide-panels__backstage_visible');
        this.state.setHidden();
    }
}

export default BackstageAnimation;
