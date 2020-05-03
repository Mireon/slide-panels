import Target from '@entities/Target';
import PanelAnimation from '@modules/Panels/PanelAnimation';
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
     * The constructor.
     *
     * @param element { Element }
     *   ...
     */
    public constructor(element: Element) {
        this.id = this.extractId(element);
        this.side = this.extractSide(element);
        this.animation = new PanelAnimation(element);
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
     * @return string
     */
    public getSide(): string {
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
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.animation.hide();
    }
}

export default Panel;
