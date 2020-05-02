import Selector from '@scripts/Utilities/Selector';

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
     * The constructor.
     */
    constructor() {
        this.element = Selector.element('backstage').get();
    }

    /**
     * ...
     *
     * @return void
     */
    public show() {
        this.element.classList.add('slide-panels__backstage_visible');
        this.element.classList.remove('slide-panels__backstage_hidden');
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.element.classList.add('slide-panels__backstage_hidden');
        this.element.classList.remove('slide-panels__backstage_visible');
    }
}

export default BackstageAnimation;
