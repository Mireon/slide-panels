import LeverClickListener from './LeverClickListener';
import Target from '@scripts/Utilities/Target';

/**
 * ...
 */
enum Actions {
    SHOW = 'show',
    HIDE = 'hide',
}

/**
 * ...
 */
class Lever {
    /**
     * ...
     *
     * @type Element
     */
    private readonly element: Element;

    /**
     * ...
     *
     * @type string
     */
    private readonly action: string;

    /**
     * ...
     *
     * @type Target
     */
    private readonly target: Target;

    /**
     * The constructor.
     *
     * @param element { Element }
     */
    public constructor(element: Element) {
        this.element = element;
        this.action = this.extractAction(element);
        this.target = this.extractTarget(element);
    }

    /**
     * ...
     *
     * @param element { Element }
     *   ...
     *
     * @return string
     */
    public extractAction(element: Element): string {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return Actions.SHOW;
        }

        const action: string = element.getAttribute(attribute);

        switch (action) {
            case Actions.SHOW:
            case Actions.HIDE:
                return action;
        }

        return null;
    }

    /**
     * ...
     *
     * @param element { Element }
     *  ...
     *
     * @return Target
     */
    public extractTarget(element: Element): Target {
        const attribute = 'data-target';

        return new Target(element.getAttribute(attribute));
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toShow(): boolean {
        return this.action === Actions.SHOW && this.target !== null;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toHide(): boolean {
        return this.action === Actions.HIDE;
    }

    /**
     * ...
     *
     * @type Target
     */
    public getTarget(): Target {
        return this.target;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public setClickListener(listener: LeverClickListener): void {
        this.element.addEventListener('click', (e) => {
            e.preventDefault();
            listener(this);
        });
    }
}

export default Lever;
