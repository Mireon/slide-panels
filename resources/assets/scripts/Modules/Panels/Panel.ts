import Target from '@entities/Target';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import State from '@tools/State';
import { C } from '@entities/C';

/**
 * ...
 */
class Panel {
    /**
     * ...
     *
     * @type string
     */
    private readonly id: string;

    /**
     * ...
     *
     * @type C.side
     */
    private readonly side: C.side;

    /**
     * ...
     *
     * @type PanelAnimation
     */
    private readonly animation: PanelAnimation;

    /**
     * ...
     *
     * @type State
     */
    private state: State;

    /**
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.id = this.extractId(element);
        this.side = this.extractSide(element);
        this.animation = new PanelAnimation(element);
        this.state = new State();
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public extractId(element: Element): string {
        const attribute = 'data-id';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const id = element.getAttribute(attribute);

        if (id === '') {
            return null;
        }

        return id;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return string
     */
    public extractSide(element: Element): C.side {
        const attribute = 'data-side';

        if (!element.hasAttribute(attribute)) {
            return null;
        }

        const side = element.getAttribute(attribute);

        if (side === C.side.LEFT || side === C.side.RIGHT) {
            return side;
        }

        return null;
    }

    /**
     * ...
     *
     * @param id { string }
     *  ...
     *
     * @return string
     */
    public equalId(id: string): boolean {
        return this.id === id;
    }

    /**
     * ...
     *
     * @return State
     */
    public getState(): State {
        return this.state;
    }

    /**
     * ...
     *
     * @return C.side
     */
    public getSide(): C.side {
        return this.side;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.show();
            this.state.setShowing();
            this.state.setVisible(300);
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        if (this.state.isVisible()) {
            this.animation.hide();
            this.state.setHiding();
            this.state.setHidden(300);
        }
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public inside(target: Target): void {
        if (this.state.isHidden()) {
            this.animation.inside();
            this.state.setShowing();
            this.state.setVisible(300);
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public outside(): void {
        if (this.state.isVisible()) {
            this.animation.outside();
            this.state.setHiding();
            this.state.setHidden(300);
        }
    }
}

export default Panel;
