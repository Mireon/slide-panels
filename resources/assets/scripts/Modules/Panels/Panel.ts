import Target from '@entities/Target';
import PanelAnimation from '@modules/Panels/PanelAnimation';
import Visibility from '@states/Visibility';
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
     * @type Visibility
     */
    private state: Visibility;

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
        this.state = new Visibility();
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
    public isEqualId(id: string): boolean {
        return this.id === id;
    }

    /**
     * ...
     *
     * @return Visibility
     */
    public getState(): Visibility {
        return this.state;
    }

    /**
     * ...
     *
     * @return string
     */
    public getId(): string {
        return this.id;
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
        this.animation.show();
        setTimeout(() => this.state.setVisible(), 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.animation.hide();
        setTimeout(() => this.state.setHidden(), 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public inside(): void {
        this.animation.inside();
        setTimeout(() => this.state.setVisible(), 300);
    }

    /**
     * ...
     *
     * @return void
     */
    public outside(): void {
        this.animation.outside();
        setTimeout(() => this.state.setHidden(), 300);
    }
}

export default Panel;
