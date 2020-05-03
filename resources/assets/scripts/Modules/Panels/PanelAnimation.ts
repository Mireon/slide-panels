import VisibilityState from '@states/VisibilityState';

/**
 * ...
 */
class PanelAnimation {
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
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.element = element;
        this.state = new VisibilityState();
    }

    /**
     * ...
     *
     * @return void
     */
    public show(): void {
        if (this.state.isVisible()) { return; }

        this.element.classList.add('slide-panels__panel_visible');
        this.element.classList.remove('slide-panels__panel_hidden');
        this.state.setVisible();
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isHidden()) { return; }

        this.element.classList.add('slide-panels__panel_hidden');
        this.element.classList.remove('slide-panels__panel_visible');
        this.state.setHidden();
    }
}

export default PanelAnimation;
