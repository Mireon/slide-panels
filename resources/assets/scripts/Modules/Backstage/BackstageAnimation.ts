import Selector from '@tools/Selector';
import Visibility from '@states/Visibility';

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
     * @type Visibility
     */
    private state: Visibility;

    /**
     * The constructor.
     */
    public constructor() {
        this.element = Selector.element('backstage').get();
        this.state = new Visibility();
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
