import LeverClickListener from '@modules/Levers/LeverClickListener';
import Target from '@entities/Target';
import { C } from '@entities/C';

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
     * @type C.action
     */
    private readonly action: C.action;

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
    public extractAction(element: Element): C.action {
        const attribute = 'data-action';

        if (!element.hasAttribute(attribute)) {
            return C.action.SHOW;
        }

        const action: string = element.getAttribute(attribute);

        switch (action) {
            case C.action.SHOW:
            case C.action.HIDE:
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
        return this.action === C.action.SHOW && this.target !== null;
    }

    /**
     * ...
     *
     * @type boolean
     */
    public toHide(): boolean {
        return this.action === C.action.HIDE;
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
